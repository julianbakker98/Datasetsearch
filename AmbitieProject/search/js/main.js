$(() => {
    const dataset_search_input = $('#dataset-search-input');

    const init_token_input_field = (target, on_create, on_delete, on_edit, suggestion_engine) => {
        const kwargs = {};

        if (!on_edit) kwargs['allowEditing'] = false;
        if (suggestion_engine) {
            kwargs['typeahead'] = [
                {
                    hint: false,
                    highlight: true,
                    minLength: 1,
                }, {
                    source: suggestion_engine.ttAdapter(),
                    limit:10
                }
            ];
        }

        const token_field = target.tokenfield(kwargs);
        if (on_create) token_field.on('tokenfield:createtoken', on_create);
        if (on_delete) token_field.on('tokenfield:removetoken', on_delete);
        if (on_edit) token_field.on('tokenfield:edittoken', on_edit);
    };

    const dataset_search_engine = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: 'https://catalog.data.gov/api/3/action/package_search?q=title:%QUERY',
            wildcard: '%QUERY',
            filter: (response) => {
                const results = [];
                for (let result in response['result']['results']) {
                    if (response['result']['results'].hasOwnProperty(result)){
                        results.push(response['result']['results'][result]['title']);
                    }
                }
                return results;
            }
        }
    });

    dataset_search_engine.initialize();
    init_token_input_field(dataset_search_input, undefined, undefined, undefined,
        dataset_search_engine);

});
