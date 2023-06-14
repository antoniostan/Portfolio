package dev.mam.help.userhelp.resource;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import com.fasterxml.jackson.annotation.JsonProperty;

import java.util.List;

@JsonIgnoreProperties(ignoreUnknown = true)
public class SearchResponse<T> {

    private long took;

    @JsonProperty("timed_out")
    private boolean timedOut;

    private SearchHits<T> hits;

    public SearchResponse() {
        // Default constructor
    }

    public long getTook() {
        return took;
    }

    public void setTook(long took) {
        this.took = took;
    }

    public boolean isTimedOut() {
        return timedOut;
    }

    public void setTimedOut(boolean timedOut) {
        this.timedOut = timedOut;
    }

    public SearchHits<T> getHits() {
        return hits;
    }

    public void setHits(SearchHits<T> hits) {
        this.hits = hits;
    }

    @JsonIgnoreProperties(ignoreUnknown = true)
    public static class SearchHits<T> {

        @JsonProperty("total")
        private Total total;

        @JsonProperty("max_score")
        private float maxScore;
        private List<SearchHit<T>> hits;

        public SearchHits() {
            // Default constructor.
        }

        public Total getTotal() {
            return this.total;
        }

        public void setTotal(Total total) {
            this.total = total;
        }

        public float getMaxScore() {
            return maxScore;
        }

        public void setMaxScore(float maxScore) {
            this.maxScore = maxScore;
        }

        public List<SearchHit<T>> getHits() {
            return hits;
        }

        public void setHits(List<SearchHit<T>> hits) {
            this.hits = hits;
        }

        @JsonIgnoreProperties(ignoreUnknown = true)
        public static class SearchHit<T> {

            @JsonProperty("_index")
            private String index;

            @JsonProperty("_type")
            private String type;

            @JsonProperty("_id")
            private String id;

            @JsonProperty("_score")
            private float score;

            @JsonProperty("_source")
            private T source;

            public SearchHit() {
                // Default constructor.
            }

            public String getIndex() {
                return index;
            }

            public void setIndex(String index) {
                this.index = index;
            }

            public String getType() {
                return type;
            }

            public void setType(String type) {
                this.type = type;
            }

            public String getId() {
                return id;
            }

            public void setId(String id) {
                this.id = id;
            }

            public float getScore() {
                return score;
            }

            public void setScore(float score) {
                this.score = score;
            }

            public T getSource() {
                return source;
            }

            public void setSource(T source) {
                this.source = source;
            }
        }

        public static class Total {
            @JsonProperty("value")
            private int value;
            @JsonProperty("relation")
            private String relation;

            public Total() {
                super();
            }

            public int getValue() {
                return value;
            }

            public void setValue(int value) {
                this.value = value;
            }

            public String getRelation() {
                return relation;
            }

            public void setRelation(String relation) {
                this.relation = relation;
            }

        }
    }

}

