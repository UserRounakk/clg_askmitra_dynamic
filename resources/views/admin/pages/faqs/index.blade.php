@extends('admin.admin-panel')

@section('page')
    FAQs
@endsection
@section('faqs')
    active
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @foreach ($faqs as $faq)
                    <div class="card collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $faq->question }}
                                @if ($faq->is_important)
                                    <span class="right badge badge-primary">IMP</span>
                                @endif
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">
                            {{ $faq->answer }}
                        </div>
                        <div class="card-footer">
                            <a href="/faqs/{{ $faq->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i>
                                Edit</a>
                            <form class='d-inline' action="/faqs/{{ $faq->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete the question?')"><i
                                        class="fas fa-trash"></i></i> Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{-- Use if else for add new or edit form --}}
                @isset ($question)
                    <div class="card px-3">
                    <div class="card-header">
                        <h4 class="card-title mt-5 "> Edit Faq</h4>
                    </div>
                    <form action="/faqs/{{ $question->id }}" method="post" class="card-body">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea name="question" class="form-control" rows="3" placeholder="Enter Question...">{{ $question->question }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="answer" class="form-control" rows="3" placeholder="Enter Answer...">{{ $question->answer }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-check my-4">
                            <input class="form-check-input" type="checkbox" value=true id="is_important"
                                name="is_important" {{ $question->is_important ? "checked" : "" }}>
                            <label class="form-check-label" for="is_important">
                                Is Important?
                            </label>
                        </div>
                        <a href="/faqs" class="btn btn-outline-primary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                @else
                    <div class="card px-3">
                    <div class="card-header">
                        <h4 class="card-title mt-5 "> Add new Faq</h4>
                    </div>
                    <form action="/faqs" method="post" class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea name="question" class="form-control" rows="3" placeholder="Enter Question..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="answer" class="form-control" rows="3" placeholder="Enter Answer..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-check my-4">
                            <input class="form-check-input" type="checkbox" value=true id="is_important"
                                name="is_important">
                            <label class="form-check-label" for="is_important">
                                Is Important?
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                @endif
                @if (\Session::has('msg'))
                    <br>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <br>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
