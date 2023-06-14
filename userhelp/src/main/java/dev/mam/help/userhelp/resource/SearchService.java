package dev.mam.help.userhelp.resource;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.ws.rs.client.Client;
import javax.ws.rs.client.Entity;
import javax.ws.rs.client.WebTarget;
import javax.ws.rs.core.GenericType;
import javax.ws.rs.core.MediaType;

@Service
public class SearchService {

    private static final String PATH_SEARCH = "_search";

    private final String REQUEST = "POST";
    private Client restClient;
    private String baseUrl;
    private static final String DEFAULT_INDEX = "html";

    private static String index;

    @Value("${spring.elasticsearch.rest.host}")
    private String host;

    @Value("${spring.elasticsearch.rest.scheme}")
    private String scheme;

    @Value("${spring.elasticsearch.rest.port}")
    private int port;

    public SearchService(@Autowired Client restClient,
                         @Value("${spring.elasticsearch.rest.uris}") String baseUrl) {
        this.restClient = restClient;
        this.baseUrl = baseUrl;
    }

    public void setBaseUrl(String baseUrl) {
        this.baseUrl = baseUrl;
    }

    public SearchResponse<PageView> search(Query query, int version) {
        if (version == 0) {
            index = DEFAULT_INDEX;
        } else {
            index = DEFAULT_INDEX + ";" + version;
        }
        WebTarget target = this.restClient.target(this.baseUrl).path(index).path(PATH_SEARCH);
        return target.request().post(Entity.entity(query, MediaType.APPLICATION_JSON),
                new GenericType<SearchResponse<PageView>>() {

                });
    }
}