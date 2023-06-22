package dev.mam.help.userhelp;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.autoconfigure.jdbc.DataSourceAutoConfiguration;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication(exclude = DataSourceAutoConfiguration.class)
@ComponentScan({"dev.mam.help.userhelp"})
public class Application {

    public static void main(String[] args) {
        SpringApplication.run(Application.class, args);
    }

}