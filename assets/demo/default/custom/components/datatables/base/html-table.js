//== Class definition

var DatatableHtmlTableDemo = function() {
	//== Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('.m-datatable').mDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [
				{
					field: 'id',
					title: 'ID',
					sortable: true,
					filterable: true,
					textAlign: 'left',
					type: 'number',
					width: 40,
				}, {
					field: 'autor',
					title: 'Autor',
					sortable: true,
					filterable: true,
					textAlign: 'left',
					type: 'string',
					width: 110,
				}, {
					field: 'noticia',
					title: 'Notícia',
					sortable: true,
					filterable: true,
					textAlign: 'left',
					type: 'string',
					width: 600,
				}, {
					field: 'destaque',
					title: 'Destaque até',
					sortable: true,
					filterable: true,
					textAlign: 'left',
					type: 'date',
					format: 'DD/MM/YYYY HH:II',
					width: 160,
				}, {
					field: 'status',
					title: 'Status',
					sortable: true,
					filterable: true,
					textAlign: 'left',
					type: 'string',
					width: 82,
				}, {
					field: 'acoes',
					title: 'Ações',
					sortable: true,
					filterable: true,
					textAlign: 'left',
					type: 'string',
					width: 190,
				},
			],
		});

	};

	return {
		//== Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	DatatableHtmlTableDemo.init();
});