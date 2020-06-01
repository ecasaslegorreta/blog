@extends('theme.frontoffice.layouts.admin')

@section('title','Post Admin')

@section('head')


@endsection

@section('header')

@endsection

@section('content')

<main>
        <div class="container-fluid">
            <h1 class="mt-4">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
          <!--  <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div>-->
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                   <th>Id</th>
                                   <th>Title</th>
                                   <th>Content</th>
                                   <th>Image</th>
                                   <th>User</th>
                                   <th>Tools</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>User</th>
                                        <th>Tools</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                 @foreach ($posts as $post)
                                        <tr>
                                          <td> {{ $post ->id }}</td>
                                          <td> {{ $post ->title}} </td>
                                          <td> {{ $post->content}}</td>
                                          <td> {{ $post ->image_url}}</td>
                                          <td> {{ $post -> userId}}</td>
                                          <td><i class="fas fa-edit mr-1"></i></span>
                                          <i class="fas fa-trash mr-1"></i></span></td>
                                        </tr>
                                     
                                 @endforeach   
                                
                                
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@section('foot')

@endsection