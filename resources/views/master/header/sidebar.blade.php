<!-- Sidebar -->
    <div class="sidebar bg-dark text-white position-fixed">

        <div class="p-3 border-bottom">
            <h4 class="mb-0">My Admin</h4>
        </div>

        <div class="list-group list-group-flush">

            <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="bi bi-people"></i> Users 
            </a>

            <a href="{{ route('courses.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="bi bi-book"></i> Courses
            </a>

            <a href="{{ route('enrollments.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="bi bi-journal-text"></i> Enrollments
            </a>

        </div>