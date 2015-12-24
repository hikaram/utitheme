$(function(){
    $('#navigation').Tree({
		initial_expanding:2,
        subtree : false,
		ajax : {
			url 	: '/admin/navigation',
			node_attributes : {
				distr_id    : 'node',
                level       : 'level'
			}
		}
	});
});