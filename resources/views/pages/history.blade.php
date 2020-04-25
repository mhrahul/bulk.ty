@extends('layouts.app')
@section('content')
<div class="container-fluid app-body">
    <h3>Recent Posts Sent To Buffer</h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover social-accounts">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $hd)
                    @if(!empty ( $data->group_info ))
                    <tr>
                        <td>
                           
                            {{$group->name}}
                            
                        </td>
                        <td>aa</td>
                        <td>aa</td>
                        <td>{{$hd->post_text}}</td>
                        <td>{$hd->sent_at}</td>
                    </tr>
                    @endif

                    @endforeach


                </tbody>
                {{ $data->links() }}
            </table>
        </div>
        @endsection