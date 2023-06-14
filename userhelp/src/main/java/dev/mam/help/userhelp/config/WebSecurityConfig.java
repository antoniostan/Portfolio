package dev.mam.help.userhelp.config;

import org.springframework.boot.actuate.autoconfigure.security.servlet.EndpointRequest;
import org.springframework.boot.actuate.health.HealthEndpoint;
import org.springframework.boot.actuate.info.InfoEndpoint;
import org.springframework.boot.actuate.metrics.export.prometheus.PrometheusScrapeEndpoint;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.core.annotation.Order;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.web.SecurityFilterChain;

import com.unitedinternet.mam.hammer.mamconfiguration.security.web.MaMEndpoints;

@Configuration(proxyBeanMethods = false)
public class WebSecurityConfig {

    /**
     * Application specific security filter chain. By default:
     * <li>allows unauthenticated calls to known HTTP resources
     * <li>allows unauthenticated calls to probes, i.e. /-system/{liveness,readiness}
     * <li>allows error page and security.txt endpoint
     * <li>denies access to all other paths
     * <li>enables CSRF. If app is stateless and clients do not send an XSRF-Token, then you should change it to disabled to prevent 403 for non-GET requests.
     *
     * @see <a href="https://mam-confluence.1and1.com/x/hrFjAQ#SpringBootRecommendations-Authorization">Best Practices</a>
     */
    @Bean
    @Order(1)
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        return http
                .authorizeHttpRequests(requests -> requests
                        .requestMatchers("/.well-known/security.txt").permitAll()
                        .requestMatchers("/error").permitAll()
                        .requestMatchers("/").permitAll()
                        .requestMatchers("/search").permitAll()
                        .anyRequest().denyAll()
                )
                .cors().and().csrf().disable() // disabled for sending POST requests
                .build();
    }

    /**
     * Management endpoint specific security filter chain. By default:
     * <li>allows unauthenticated calls to non-sensitive actuator endpoints
     * <li>denies all other endpoints to prevent accidential exposure of sensitive endpoints
     */
    @Bean
    @Order(0)
    public SecurityFilterChain managementSecurityFilterChain(HttpSecurity http) throws Exception {
        return http
                .securityMatcher("/-system/**")
                .authorizeHttpRequests(requests -> requests
                        .requestMatchers(
                                EndpointRequest.to(
                                        InfoEndpoint.class,
                                        HealthEndpoint.class,
                                        PrometheusScrapeEndpoint.class
                                )
                        ).permitAll()
                        .requestMatchers(MaMEndpoints.unauthenticated()).permitAll()
                        .requestMatchers(EndpointRequest.toAnyEndpoint()).denyAll()
                )
                .build();
    }
}
