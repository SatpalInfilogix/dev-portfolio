@extends('layouts.admin-layout')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">My Projects</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm">
                            <div class="search-box me-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" autocomplete="off" id="searchTableList"
                                        placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-auto">
                            <div class="text-sm-end">
                                <a href="projects-create.html" class="btn btn-success btn-rounded" id="addProject-btn"><i
                                        class="mdi mdi-plus me-1"></i> Add New Project</a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="">
                        <div class="table-responsive">
                            <table
                                class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless"
                                id="projectList-table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 60px">#</th>
                                        <th scope="col">Projects</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Team</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>Projects</td>
                                        <td>Due Date</td>
                                        <td>Status</td>
                                        <td>Team</td>
                                        <td>Action</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

    <x-include-plugin dataTable=""></x-include-plugin>
    <script>
        $(function() {
            $("#projectList-table").DataTable()
        })
    </script>
@endsection