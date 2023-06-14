package dev.mam.help.userhelp.resource;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonInclude.Include;
import com.fasterxml.jackson.annotation.JsonProperty;

@JsonInclude(Include.NON_NULL)
@JsonIgnoreProperties(ignoreUnknown = true)
public class PageView {
    private String id;

    /*
     * Analyzed and indexed fields
     * */
    @JsonProperty("file_path")
    private String path;

    public static PageViewBuilder builder() {
        return new PageViewBuilder();
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPath() {
        return path;
    }

    public void setPath(String path) {
        this.path = path;
    }

    public static class PageViewBuilder {
        private String id;

        /*
         * Indexable fields
         * */
        private String path;

        private PageViewBuilder() {

        }

        public PageViewBuilder withPath(String path) {
            this.path = path;
            return this;
        }

        public PageView build() {
            PageView page = new PageView();
            page.setPath(this.path);
            return page;
        }
    }
}
