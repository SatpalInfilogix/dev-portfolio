@extends('layouts.admin-layout')

@section('title')
    Add new Project
@endsection

@section('content')
    <form id="createproject-form" autocomplete="off" novalidate>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                        <input type="hidden" class="form-control" id="project-id-input">
                        <div class="mb-3">
                            <label for="projectname-input" class="form-label">Project Name</label>

                            <input id="projectname-input" name="projectname-input" type="text" class="form-control"
                                placeholder="Enter project name..." required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project Image</label>

                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute bottom-0 end-0">
                                        <label for="project-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer shadow font-size-16">
                                                    <i class='bx bxs-image-alt'></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="project-image-input"
                                            type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="#" id="projectlogo-img" class="avatar-md h-auto rounded-circle" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="projectdesc-input" class="form-label">Project Description</label>
                            <textarea class="form-control" id="projectdesc-input" rows="3" placeholder="Enter project description..."></textarea>
                        </div>
                        <div>
                            <label class="form-label">Attached Files</label>
                            <div class="fallback dropzone" enctype="multipart/form-data">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Publish</h5>

                        <div class="mb-3">
                            <label class="form-label" for="project-status-input">Status</label>
                            <select class="form-select" id="project-status-input">
                                <option value="Completed" selected>Completed</option>
                                <option value="In Progress">In Progress</option>
                            </select>
                            <div class="invalid-feedback">Please select project status.</div>
                        </div>

                        <div>
                            <label class="form-label" for="project-visibility-input">Visibility</label>
                            <select class="form-select" id="project-visibility-input">
                                <option value="Private">Private</option>
                                <option value="Public">Public</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-lg-8">
                <div class="text-end mb-4">
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </div>
            </div>
        </div>
        <!-- end row -->
    </form>

    <x-include-plugins :plugins="['dropzone']" />

    @push('scripts')
        <script>
            $(function() {
                $("#project-image-input").on("change", function() {
                    var $e = $("#projectlogo-img"),
                        file = $(this)[0].files[0],
                        reader = new FileReader();

                    reader.onload = function() {
                        $e.attr("src", reader.result);
                    };

                    if (file) {
                        reader.readAsDataURL(file);
                    }
                });

                (Dropzone.autoDiscover = !1);
                new Dropzone(".dropzone", {
                    url: "https://httpbin.org/post"
                });
            })
        </script>
    @endpush
@endsection
