
<script type="text/javascript">

        count_medical_income();
        function count_medical_income(type = "all"){
            if (type == 'all') {
                $('#show_medical_heading').text('All Incomes');
            }else if (type == 'today') {
                $('#show_medical_heading').text('Today Incomes');
            }else if (type == 'yesterday') {
                $('#show_medical_heading').text('Yesterday Incomes');
            }else if (type == 'last_30_days') {
                $('#show_medical_heading').text('Last 30days Incomes');
            }else{
                $('#show_medical_heading').text('All Incomes');
            }
            $.ajax({
                type:'ajax',
                method:'GET',
                url:'<?= site_url('Admin/count_medical_income/'); ?>'+type,
                beforeSend:function(data){
                    $('#show_medical_income').text('Loading..');    
                },
                success:function(data){
                    $('#show_medical_income').html(data);       
                },
                error:function(){
                    $('#show_medical_income').text('0');
                }
            });
        }




    count_patents();
        function count_patents(type = "all"){
            if (type == 'all') {
                $('#show_patent_heading').text('All Patents');
            }else if (type == 'today') {
                $('#show_patent_heading').text('Today Patents');
            }else if (type == 'yesterday') {
                $('#show_patent_heading').text('Yesterday Patents');
            }else if (type == 'last_30_days') {
                $('#show_patent_heading').text('Last 30days Patents');
            }else{
                $('#show_patent_heading').text('All Patents');
            }
            $.ajax({
                    type:'ajax',
                    method:'GET',
                    url:'<?= site_url('Admin/count_patents/'); ?>'+type,
                    beforeSend:function(data){
                        $('#show_patent').text('Loading..');    
                    },
                    success:function(data){
                        $('#show_patent').html(data);       
                    },
                    error:function(){
                        $('#show_patent').text('0');
                    }
                });
        }

        //Count Income 
         count_income();
        function count_income(type = "all"){
            if (type == 'all') {
                $('#show_income_heading').text('All Income');
            }else if (type == 'today') {
                $('#show_income_heading').text('Today Income');
            }else if (type == 'yesterday') {
                $('#show_income_heading').text('Yesterday Income');
            }else if (type == 'last_30_days') {
                $('#show_income_heading').text('Last 30days Income');
            }else{
                $('#show_income_heading').text('All Income');
            }
            $.ajax({
                    type:'ajax',
                    method:'GET',
                    url:'<?= site_url('Admin/count_income/'); ?>'+type,
                    beforeSend:function(data){
                        $('#show_income').text('Loading..');    
                    },
                    success:function(data){
                        $('#show_income').html(data);       
                    },
                    error:function(){
                        $('#show_income').text('0');
                    }
                });
        }
        //Count Income 


//Chart Dashboard
window.onload = function () {

var options = {
    animationEnabled: true,
    title: {
         text: "Hospital Income & Patients Status"
    },
    data: [{
        type: "doughnut",
        innerRadius: "40%",
        showInLegend: true,
        legendText: "{label}",
        indexLabel: "{label}:",
        dataPoints: [
             { label : 'Total Medical Earning',     y: <?= $chart_data['ch_medical_earning']; ?> },
             { label : 'Total Patient Earning',     y: <?= $chart_data['ch_patient_earning']; ?> },
             { label : 'Total Patient Visit',       y: <?= $chart_data['total_patients']; ?> },
             { label : 'Total Appointment',       y: <?= $chart_data['total_appointment']; ?> }
               
        ]
    }]
};
$("#chartContainer").CanvasJSChart(options);

}         
//Chart Dashboard        
</script>