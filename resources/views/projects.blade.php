<x-cms-projects-layout>

    @section('banner')
        @parent
        {{ app(\Hup234design\FilamentCms\Settings\CmsSettings::class)->projects_title }}
    @endsection

    @foreach($projects as $project)
        <h2>
            <a href="{{ route('project', $project->slug) }}">
                {{  $project->title }}
            </a>
        </h2>
        <p>{{  nl2br($project->summary) }}</p>
    @endforeach

    <div>
        {{  $projects->links() }}
    </div>

</x-cms-projects-layout>
