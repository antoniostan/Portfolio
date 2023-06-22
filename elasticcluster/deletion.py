from elasticsearch import Elasticsearch

# Define the Elasticsearch server URL and create a connection
es = Elasticsearch(
    ['http://localhost:9200']
    # basic_auth=('elastic', 'tQnJZ5bo9fEYzijeyANC'),
    # verify_certs=False
)

# Define the index name
default_index = 'html'
version = 1

# Define the query to select documents to delete
query = {'query': {'match_all': {}}}
index = default_index + ';' + str(version)


# Delete documents from the index
response = es.delete_by_query(index=index, body=query)

# Print the number of deleted documents
print(f"Deleted {response['deleted']} documents")
