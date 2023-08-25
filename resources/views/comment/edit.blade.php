<x-app-layout>
    <div class="container">
        <div class="row justify-content-center p-8">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body mt-4">
                        <form method="post" action="{{ route('comment.update', $comment->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row my-4">
                                <label for="comment_text" class="col-md-4 col-form-label text-md-right">{{ __('コメント') }}</label>

                                <div class="col-md-6">
                                    <textarea id="comment_text" class="form-control @error('comment_text') is-invalid @enderror" name="comment_text" required>{{ old('comment_text', $comment->comment_text) }}</textarea>

                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('変更を保存する') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
