$(function () {
var colors = [
            { Name: "Psychologist",},
            { Name: "Gynalogist" },
            { Name: "Dermotologist" },
            { Name: "Sexologist" },
            { Name: "Dietition" },
            { Name: "Ayurveda" },
            { Name: "Homeopath" },
            
        ];


  $(function () {
  	$("#checkboxSelectCombo").igCombo({
                width: "100%",
                dataSource: colors,
                textKey: "Name",
                valueKey: "Name",
                multiSelection: {
                enabled: true,
                showCheckboxes: true
                }
            });

        });
	});