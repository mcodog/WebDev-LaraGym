@extends('admin.shared.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex flex-direction-row">
                        <div class="picture flex-grow-1 border">
                            <img src="{{ asset('public/users/user.jpg') }}" alt="user profile">
                            <button><i class="fas fa-pen"></i></button>
                        </div>
                        <div class="inputs flex-grow-1 border">
                            <p>Name: <span id="name">{{ Auth::user()->name }}</span> <button class="edit-btn" onclick="toggleEdit('name')"><i class="fas fa-pen"></i></button></p>
                            <p>Email: <span id="email">{{ Auth::user()->email }}</span> <button class="edit-btn" onclick="toggleEdit('email')"><i class="fas fa-pen"></i></button></p>
                            <p>Age: <span id="age">{{ $users->first()->age }}</span> <button class="edit-btn" onclick="toggleEdit('age')"><i class="fas fa-pen"></i></button></p>
                            <p>Gender: <span id="gender">{{ $users->first()->gender }}</span> <button class="edit-btn" onclick="toggleEdit('gender')"><i class="fas fa-pen"></i></button></p>
                            <div id="save-cancel-btns" style="display: none;">
                            <button class="btn btn-primary" onclick="saveData()">Save</button>
                            <button class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
                        </div>
                    </div>
                    
                    
                    <!-- Add more profile information as needed -->
</div><script>
    function toggleEdit(field) {
        var fieldValue = document.getElementById(field);
        var editBtn = document.querySelector("#" + field + " + button.edit-btn");
        var saveCancelBtns = document.getElementById("save-cancel-btns");

        if (fieldValue.tagName.toLowerCase() === "input") {
            // Revert to <span> and update its text
            fieldValue.outerHTML = "<span id='" + field + "'>" + fieldValue.value + "</span>";
            editBtn.innerHTML = '<i class="fas fa-pen"></i>';
            saveCancelBtns.style.display = "none";
        } else if (field === "gender") {
            // Replace <span> with <select> and set its value
            fieldValue.outerHTML = `<select id="${field}">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>`;
            fieldValue = document.getElementById(field); // Reassign fieldValue to the newly created select element
            fieldValue.value = document.getElementById("gender").innerText; // Set initial value
            editBtn.innerHTML = '<i class="fas fa-times"></i>';
            saveCancelBtns.style.display = "block";
        } else {
            // Replace <span> with <input> and set its value
            fieldValue.outerHTML = "<input type='text' id='" + field + "' value='" + fieldValue.innerText + "'>";
            editBtn.innerHTML = '<i class="fas fa-times"></i>';
            saveCancelBtns.style.display = "block";
        }
    }

    function saveData() {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "{{ Auth::user()->id }}/save-profile"); // Replace "/save-profile-data" with the URL of the page to which you want to send the data

    // Create CSRF token input field
    var csrfTokenInput = document.createElement("input");
    csrfTokenInput.setAttribute("type", "hidden");
    csrfTokenInput.setAttribute("name", "_token");
    csrfTokenInput.setAttribute("value", "{{ csrf_token() }}"); // This will be replaced with the actual CSRF token value in your Blade template

    form.appendChild(csrfTokenInput);

    // Iterate over all input and select elements
    document.querySelectorAll("input, select").forEach(function(element) {
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", element.id);
        input.setAttribute("value", element.value);
        form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();
}

    function cancelEdit() {
        location.reload();
    }
</script>
            </div>
        </div>
    </div>
</div>
@endsection
