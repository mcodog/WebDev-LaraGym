<template>
  <ais-instant-search :search-client="searchClient" index-name="contacts">
    <!-- Other search components go here -->
  </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite'

export default {
  data() {
    return {
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
      ),
    }
  },
}
</script>
