import os
from elasticsearch import Elasticsearch

# Define the Elasticsearch server URL
es = Elasticsearch(
    ['http://localhost:9200']
)

# Define the index and document type for the html metas
default_index = 'html'

# Define the folder path
folder_path = '/home/anstan/Documents/Spring/elasticcluster/main-folder/'
file_separator = '/'

# Define the version of the site (MANUAL CHANGES WHEN NEW VERSION APPEARS)
default_version = 3


# Function to check existence of file in the Elasticsearch server
def check_existence(path, file):
    # Defining the query to search for the file
    query = {
        "query": {
            "term": {
                "file_path.keyword": path
            }
        }
    }

    return es.exists(index=default_index, id=file, body=query)


# Function that uploads the file in the Elasticsearch server
def upload_file(path, file, version):
    with open(path, 'r') as file_example:
        file_contents = file_example.read()

    file_name = os.path.basename(path)
    file_path = f"http://localhost:9200/html/{file_name}"

    # Create the Elasticsearch document
    document_html = {
        'file_name': file,
        'file_contents': file_contents,
        'file_path': file_path
    }

    index = default_index + ";" + str(version)

    # Upload the document to Elasticsearch
    response = es.create(index=index, id=file, document=document_html)
    all_files = es.create(index=default_index, id=file, document=document_html)

    # Print the response
    print(response)
    print(all_files)


# Function that runs the entire program: scans for folders/subfolders/files in the specified path, and if it finds
# a file that's not uploaded to the elasticsearch server (and it's also a html file) it uploads it to the server
def run_elastic(version):
    for subdir, dirs, files in os.walk(folder_path):
        for file in files:
            if file.endswith(".html"):
                # Read the file contents
                file_path = os.path.join(subdir, file)
                exists = check_existence(file_path, file)
                if exists:
                    print(f"File '{file}' is already uploaded to Elasticsearch.")
                else:
                    upload_file(file_path, file, version)


run_elastic(default_version)
