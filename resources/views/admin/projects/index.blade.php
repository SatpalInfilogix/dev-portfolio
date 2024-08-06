@extends('layouts.admin-layout')

@section('title')
    My Projects
@endsection

@section('content')
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
                                <a href="{{ route('projects.create') }}" class="btn btn-success btn-rounded"
                                    id="addProject-btn">
                                    <i class="mdi mdi-plus me-1"></i>
                                    Add New Project
                                </a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="">
                        <div class="table-responsive">
                            <table id="projectList-table"
                                class="table project-list-table align-middle table-nowrap dt-responsive nowrap w-100 table-borderless">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 60px">#</th>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Technologies Used</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

    <x-include-plugins :plugins="['dataTable']" />

    <script>
        $(function() {
            let table = $("#projectList-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "{{ route('projects.get') }}",
                    "type": "POST",
                    data: function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.search = $('#searchTableList').val();
                    },
                    error: function(xhr, error, thrown) {
                        alert("An error occurred while fetching data. Please try again.");
                    }
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "title",
                        title: "Project Title"
                    },
                    {
                        data: "technologies",
                        title: "Technologies Used"
                    },
                    {
                        data: "status",
                        title: "Status"
                    },
                    {
                        data: null,
                        title: "Action",
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <a href="#" class="btn btn-info btn-sm view-project" data-id="${row.id}">View</a>
                                <a href="#" class="btn btn-warning btn-sm edit-project" data-id="${row.id}">Edit</a>
                                <button class="btn btn-danger btn-sm delete-project" data-id="${row.id}">Delete</button>
                            `;
                        }
                    }
                ],
                language: {
                    oPaginate: {
                        sNext: '<i class="mdi mdi-chevron-right"></i>',
                        sPrevious: '<i class="mdi mdi-chevron-left"></i>'
                    }
                },
                dom: 'rt<"d-flex justify-content-between"ip>'
            });

            $(".dataTables_paginate").addClass("pagination-rounded"),

                // Event listener for custom search input
                $('#searchTableList').on('keyup', function() {
                    table.ajax.reload(); // Reload data with the new search term
                });
        })
    </script>
@endsection
