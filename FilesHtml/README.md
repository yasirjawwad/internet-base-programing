 <div class="mx-auto btn-container">
        <button class="btn btn-dark">all</button>
        <button class="btn btn-dark">breakfeast</button>
        <button class="btn btn-dark">dinner</button>
        <button class="btn btn-dark">lunch</button>
        <button class="btn btn-dark">salad</button>
</div>

searcheform.addEventListener('submit', function(event) {
event.preventDefault(); // Prevent form submission

        // Get the checked radio button
        var checkedRadio = document.querySelector('input[name="category"]:checked');

        console.log(checkedRadio);
    });
