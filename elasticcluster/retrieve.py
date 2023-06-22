from elasticsearch import Elasticsearch

# Define the Elasticsearch server URL
es = Elasticsearch(
    ['http://localhost:9200']
    # basic_auth=('elastic', 'tQnJZ5bo9fEYzijeyANC'),
    # verify_certs=False
)

# Define the default index name
default_index = 'html'

# Defining the version variable (MANUAL CHANGES WHEN NEW VERSION APPEARS)
version = 1

# Define the index used to search
index = default_index + ";" + str(version)

# Define a query to retrieve all documents
query = {'query': {'match_all': {}}, "version": True}

# Send the query to Elasticsearch
response = es.search(index=index, body=query)

for hit in response['hits']['hits']:
    name = hit['_id']
    keywords = hit['_source']
    print(f"File name: {name}, Keywords:  {keywords} ")
