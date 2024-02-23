    <div id="dtBasicExample_wrapper" class="dataTables_wrapper dt-bootstrap4">     
    <div class="row">
      <div class="col-sm-12">
      <table class="table table-striped- table-bordered table-hover table-checkable" cellspacing="0" width="100%" role="grid" aria-describedby="dtBasicExample_info" style="width: 100%;" id="kt_table_2">
      <thead>
         <tr class="blue">
          <th><b>Parameters</b></th>
          <th><b>Raised Rebuttal</b></th>
          <th><b>Accepted Rebuttal</b></th>
          <th><b>Rejected Rebuttal</b></th>
          <th><b>WIP</b></th>           
        </tr>       
      </thead>
      <tbody>
          @foreach($final_data['rebuttal_array'] as $key => $despo)
          <tr> 
            <td>{{ $key }}</td>
            <td>{{ $final_data['rebuttal_array'][$key]['raised'] }}</td>
            <td>{{ $final_data['rebuttal_array'][$key]['accepted'] }}</td>
            <td>{{ $final_data['rebuttal_array'][$key]['rejected'] }}</td>
            <td>{{ $final_data['rebuttal_array'][$key]['wip'] }}</td>
          </tr> 
          @endforeach  
          <tr class="greenblue">
            <td><b> Total </b></td>
            <td>{{ $final_data['total']['raised'] }}</td>
            <td>{{ $final_data['total']['accepted'] }}</td>
            <td>{{ $final_data['total']['rejected'] }}</td>
            <td>{{ $final_data['total']['wip'] }}</td>
          </tr>      
      </tbody>
    </table>
  </div>
</div>
</div>
<script src="/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="/assets/app/custom/general/crud/datatables/basic/scrollable.js" type="text/javascript"></script>
<link href="/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
