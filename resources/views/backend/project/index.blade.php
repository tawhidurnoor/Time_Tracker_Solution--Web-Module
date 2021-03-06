@extends('backend.layouts.full.mainlayout')

@section('body')


<!--begin::Toolbar-->
<div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column py-1">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center my-1">
            <span class="text-dark fw-bolder fs-1">My Projects</span>
        </h1>
        <!--end::Title-->
    </div>
    <!--end::Page title-->
    <!--begin::Actions-->
    <div class="d-flex align-items-center py-1">
        <!--begin::Button-->
        <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px" data-bs-toggle="modal"
            data-bs-target="#kt_modal_create_project" id="kt_toolbar_primary_button">Create Project</a>
        <!--end::Button-->
    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar-->


<!--begin::Post-->
<div class="post" id="kt_post">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        {{-- <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                            </div>
                        </th> --}}
                        <th class="min-w-150px">Project</th>
                        <th class="min-w-125px">Members</th>
                        <th class="min-w-50px">Created at</th>
                        <th class="min-w-100px">Action</th>
                        {{-- <th class="text-end min-w-100px">Actions</th> --}}
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    @foreach ($projects as $project)
                    <!--begin::Table row-->
                    <tr>
                        <td class="d-flex align-items-center">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="#">
                                    <div class="symbol-label">
                                        @isset($project->project_logo)
                                        <img src="uploaded_files/project_logo/{{$project->project_logo}}" alt="{{$project->title}}" class="w-100" />
                                        @else
                                        <img src="{{Avatar::create($project->title)->toBase64()}}" alt="{{$project->title}}" class="w-100" >
                                        @endisset
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column">
                                {{$project->title}}
                            </div>
                        </td>
                        <td>
                            {{count($project->projectPeople)}}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($project->created_at)->format('d M, Y')}}
                        </td>
                        
                        <td>
                            <a href="{{route('project.details', encrypt($project->id))}}" class="btn btn-sm btn-bg-light btn-active-color-primary me-3">VIew</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Post-->



<!--begin::Pagination-->
{{-- <div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
    <!--begin::Pages-->
    <ul class="pagination">
        <li class="page-item previous">
            <a href="#" class="page-link">
                <i class="previous"></i>
            </a>
        </li>
        <li class="page-item active">
            <a href="#" class="page-link">1</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">2</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">3</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">4</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">5</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">6</a>
        </li>
        <li class="page-item next">
            <a href="#" class="page-link">
                <i class="next"></i>
            </a>
        </li>
    </ul>
    <!--end::Pages-->
</div> --}}
<!--end::Pagination-->
@endsection

@section('modals')
<!--begin::Modal - Create Campaign-->
<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="add_project" action="{{route('project.store')}}" method="POST" class="form"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add a project</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                            <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Project Title</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a title for the project"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter project Title"
                            name="project_title" required />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Project Details</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Write some description about the peoject"></i>
                        </label>
                        <textarea class="form-control form-control-solid" rows="3" name="project_description"
                            placeholder="Type Target Details" required></textarea>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="d-block fw-bold fs-6 mb-5">
                            <span class="required">Project Logo</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="E.g. Select a logo to represent the company that's running the campaign."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty image-input-outline" data-kt-image-input="true"
                            style="background-image: url(../../assets/media/svg/files/blank-image.svg)">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="project_logo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group-->

                    {{--
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tags</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a target priorty"></i>
                        </label>
                        <!--end::Label-->
                        <input class="form-control form-control-solid" value="Important, Urgent" name="tags" />
                    </div>
                    <!--end::Input group--> --}}

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
<!--end::Modal - Create Campaign-->
@endsection