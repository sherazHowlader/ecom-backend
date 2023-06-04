// sweetAlrt ke globally access korar jonno ekhane lekha hoiche
function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // form ta get korte hobe....getElementById
            // deleteData(id) theke id ta asteche dynamically
            // finally form ta submit kore dite hobe...submit()
            document.getElementById('deleteForm-' + id).submit();
        }
    })
}