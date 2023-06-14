package dev.mam.help.userhelp.resource;

import dev.mam.help.userhelp.resource.SearchResponse.SearchHits.SearchHit;
import dev.mam.help.userhelp.resource.SearchResponse.SearchHits.Total;
import jakarta.validation.constraints.Max;
import jakarta.validation.constraints.Min;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.stream.Collectors;

@RestController
public class SearchController {

    private static final Logger LOG = LoggerFactory.getLogger(SearchController.class);

    private final SearchService searchService;

    public SearchController(SearchService searchService) {
        this.searchService = searchService;
        LOG.info("SearchController created successfully!");
    }

    @GetMapping("/search")
    public ResponseEntity<?> search(@RequestParam String searchText,
                                    @Min(value = 0, message = "Version should be bigger than 0")
                                    @Max(value = 99, message = "You have reached the maximum possible version")
                                    @RequestParam int version) {
        Query query = Query.builder().text(searchText).build();
        SearchResponse<PageView> response = this.searchService.search(query, version);
        List<SearchHit<PageView>> hitList = response.getHits().getHits();
        List<PageView> pageViewList = hitList.stream().map(hit -> hit.getSource()).collect(Collectors.toList());
        Total total = response.getHits().getTotal();

        Map<String, Object> output = new HashMap<>();
        output.put("total", total);
        output.put("hits", pageViewList);

        return ResponseEntity.ok(output);
    }
}
