<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload File') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="file" class="form-label">{{ __('Select File') }}</label>
                                <input type="file" id="file" name="file" class="form-control is-invalid" required>
                            </div>

                            <div class="mb-0">
                                <div class="d-flex justify-content-end align-items-baseline">
                                    <a href="{{ url()->previous() }}" class="btn btn-link mr-3">{{ __('Cancel') }}</a>
                                    <button type="submit" class="btn btn-primary ml-4">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>