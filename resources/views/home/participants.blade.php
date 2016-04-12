@extends('layouts.bootstrap.container')

@section('page')
   <h1 class="header">Regstered Participants</h1>
   <table class="table">
      <thead class="gray-bg">
         <th>No.</th>
         <th>Name</th>
         <th>Organisation</th>
         <th>Country</th>
         <th>Position</th>
      </thead>
      <?php $i = 1 ?>
      @foreach($participants as $p)
         <tr>
            <td>{{$i++}}</td>
            <td>{{$p->title}} {{ucfirst(trans($p->first_name))}} {{ucfirst(trans($p->family_name))}}</td>
            <td>{{$p->organisation}}</td>
            <td>{{$p->country}}</td>
            <td>{{DB::table('member_types')->where('id', $p->member_type)->pluck('name')}}</td>
         </tr>
      @endforeach
   </table>
   <script type="text/javascript">
      document.title = "FAI GENERAL CONFERENCE 2016 BALI | List of Participants"
   </script>
@endsection
