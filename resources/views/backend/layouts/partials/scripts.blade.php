<!--begin::Javascript-->
<script>
	var hostUrl = "assets_backend/index.html";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets_backend/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets_backend/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets_backend/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets_backend/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>

{{-- <script src="../../../../cdn.amcharts.com/lib/5/index.js"></script>
<script src="../../../../cdn.amcharts.com/lib/5/xy.js"></script>
<script src="../../../../cdn.amcharts.com/lib/5/percent.js"></script>
<script src="../../../../cdn.amcharts.com/lib/5/radar.js"></script>
<script src="../../../../cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}

<!--end::Page Vendors Javascript-->

<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets_backend/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/intro.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/new-target.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/type.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/budget.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/settings.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/team.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/targets.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/files.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/complete.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-project/main.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/new-address.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/users-search.js')}}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->