package dev.mam.help.userhelp.resource;

import com.unitedinternet.portal.rest.client.RestClientFactoryBean;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import javax.ws.rs.client.Client;

@Configuration
public class WebConfig {
    @Value("${spring.application.name}")
    private String applicationName;

    @Value("${spring.application.version}")
    private String applicationVersion;

    @Bean
    public Client client() throws Exception {
        RestClientFactoryBean factory = new RestClientFactoryBean();
        factory.setAppName(applicationName);
        factory.setAppVersion(applicationVersion);
        factory.afterPropertiesSet();
        return factory.getObject();
    }
}
