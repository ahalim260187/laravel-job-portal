<div class="box-nav-tabs nav-tavs-profile mb-5">
    <ul class="nav" role="tablist">
        <li><a class="btn btn-border mb-20 active" href="{{ route('candidate.dashboard') }}">Dashboard</a>
        <li><a class="btn btn-border mb-20" href="{{ route('candidate.profile') }}">My Profile</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-jobs.html">My Jobs</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="btn btn-border mb-20" :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">Logout</a>
            </form>
        </li>
    </ul>
    <div class="mt-20"><a class="link-red" href="#">Delete Account</a></div>
</div>
