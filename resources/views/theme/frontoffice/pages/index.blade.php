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
                <li class="breadcrumb-item"><a href="/posts">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
          <!--  <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div>-->
        <div class="row py-lg-2">
                <div class="col-md-6">
                        <h2>THIS IS POSST LIST</h2>
                </div>
                <div class="col-md-6">
                        <a href="{{route('posts.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" arial-pressed="true">Create new Posts</a>
                </div>
        
        </div>
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
                                     <td> {!! getShorterString($post['content'],150) !!}</td>
                                     
                                     <td><img src="{{ asset('/storage/images/posts_images/' .$post['image_url']) }}" alt="{{$post['image_url']}}"  width="100"/>
                                     <td> {{ $post ->user['name']}}</td>

                                     <td>
                                         <a href="/posts/{{$post['id'] }}/edit">
                                            <i class="fas fa-edit mr-1"></i>
                                        </a>
                                        <a href="#"  data-toggle="modal" data-target="#deleteModal" data-postid="{{$post['id']}}"><i class="fas fa-trash-alt"></i></a>
                                     </td>    
                                     
                                  </tr>
                                     
                                @endforeach   
                             </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- Delete Modal-->
<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you shure you want to delete this?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Select "delete" If you realy want to delete this post.</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="/posts/">
            @method('DELETE')
            @csrf
            <input type="hidden" id="post_id" name="post_id" value="">
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
        </form>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>


@endsection

@section('foot')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var post_id = button.data('postid') 
        
        var modal = $(this)
        modal.find('.modal-footer #post_id').val(post_id)
    })
</script>
@endsection