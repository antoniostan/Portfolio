package dev.mam.help.userhelp.resource;

import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonRawValue;
import org.elasticsearch.index.query.BoolQueryBuilder;
import org.elasticsearch.index.query.MatchQueryBuilder;

import java.util.ArrayList;
import java.util.List;

@JsonInclude(value = JsonInclude.Include.NON_NULL)
public class Query {
    @JsonRawValue
    private final String query;

    private final Integer size;

    private final List<String> _source;

    private Query(String query, Integer size, List<String> _source) {
        this.query = query;
        this.size = size;
        this._source = _source;
    }

    public String getQuery() {
        return query;
    }

    public int getSize() {
        return size;
    }

    public List<String> get_source() {
        return _source;
    }

    public static QueryBuilder builder() {
        return new QueryBuilder();
    }

    public static final class QueryBuilder {
        private static final String[] FIELDS = new String[]{"file_contents"};
        private static final int SIZE_DEFAULT = 100;
        private String text;
        private int size = SIZE_DEFAULT;
        private List<String> _source = new ArrayList<>();

        public QueryBuilder size(int size) {
            this.size = size;
            return this;
        }

        public QueryBuilder text(String text) {
            this.text = text;
            return this;
        }

        public QueryBuilder fields(List<String> _source) {
            if(_source == null) {
                throw new IllegalArgumentException("_source cannot be null");
            }
            this._source = _source;
            return this;
        }

        public Query build() {
            if (this.text == null || this.text.trim().isEmpty()) {
                throw new IllegalArgumentException("fileContents must be set");
            }
            if (this.size < 1) {
                throw new IllegalArgumentException("invalid size value");
            }

            BoolQueryBuilder bool = new BoolQueryBuilder();
            MatchQueryBuilder content = new MatchQueryBuilder(FIELDS[0], this.text);
            bool.must(content);

            return new Query(bool.toString(), size, this._source);
        }
    }
}