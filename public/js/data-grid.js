    $(function() {
    
        $("#dataGridContainer").dxDataGrid({
            dataSource: serviceUrl,
            columns: [
                {
                    dataField: "name",
                    width: 150,
                }, 
                {
                    dataField: "weight",
                    minWidth: 150
                },
                {
                    dataField: "height",
                    minWidth: 150
                },
                {
                    dataField: "friendliness",
                    minWidth: 150
                },
                {
                    dataField: "Action",
                    minWidth: 10,
                    cellTemplate(container, options) {
                        $('<div>')
                        .append($('<a style="margin-left: 15px;" href="' + options.data.edit +'"><i class="fa fa-edit" style="color: gray; font-size:15px"></a>'))
                        .appendTo(container);
                    }
                }                    
            ],
            showBorders: true,
            paging: {
                enabled: true,
                pageSize: 10,
                pageIndex: 1  
            }
        
        });
    });
