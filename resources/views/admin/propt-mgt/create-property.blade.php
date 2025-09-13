@extends('admin.layout')
@section('title', 'Create A Property')
@section('content')
    <div class="p-5">
        <div class="bg-green-100 p-6">
            <h2 class="text-green-600 text-center text-bold text-4xl">Create a Property</h2>
            @if(session('failed'))
            <div class="bg-red text-white p-2">{{session('failed')}} </div>
            @endif
            <form action="{{ route('admin.properties.store') }}" 
      method="post" 
      class="my-5 p-5" 
      enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Name of
                        Property</label>
                    <input type="text" id="title" name="name" required
                        class="w-full px-3 py-2 border border-gray-300  rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="pt" class="block text-gray-700 font-bold mb-2">Name of
                        Property Type</label>
                    <select name="property_type"
                        class="w-full px-3 py-2 border border-gray-300  rounded focus:outline-none focus:ring focus:border-blue-300"
                        id="" value="">
                        <option value="apartment">Apartment</option>
                        <option value="house">House</option>
                        <option value="condo">Condo</option>
                        <option value="townhouse">Townhouse</option>
                        <option value="villa">Villa</option>
                        <option value="cottage">Cottage</option>
                    </select>

                </div>
                <div class="mb4">
                    <label for="description" class="block text-gray-700  font-bold mb-2">Description</label>
                    <input type="text" name="features" id=""
                        class="w-full px-3 py-2 border border-gray-300  rounded focus:outline-none focus:ring focus:border-blue-300">
                    <small>Separate each feature with a comma(,)</small>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700  font-bold mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" required
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
                <div class="mb-4">
                    <label for="term" class="block text-gray-700  font-bold mb-2">Lease/Rent/Purchase Term</label>
                    <input type="radio" name="lease_term" id=""> Monthly
                    <input type="radio" name="lease_term" id=""> Yearly
                    <input type="radio" name="lease_term" id=""> One-time
                </div>
                <div class="mb-4">
                    <label for="list-price" class="block text-gray-700  font-bold mb-2">Listing Price</label>
                    <input type="number" id="price" name="listing_price" required
                        class="w-full px-3 py-2 border border-gray-300  rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700  font-bold mb-2">Price</label>
                    <input type="number" id="price" name="sale_lease_price" required
                        class="w-full px-3 py-2 border border-gray-300  rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Location</label>
                    <input type="text" id="location" name="address" required
                        class="w-full px-3 py-2 border border-gray-300  rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <!-- Featured Image -->
<div class="mb-6">
  <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
  <input type="file" name="featured_image" id="featured_image" 
         class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm text-sm">
</div>

<!-- Additional Images -->
<div class="mb-6">
  <label class="block text-sm font-medium text-gray-700">Additional Images</label>
  
  <div id="additionalImages" class="space-y-3 mt-2">
    <div class="flex items-center space-x-2">
      <input type="file" name="images[]" 
             class="block w-full border border-gray-300 rounded-md shadow-sm text-sm">
      <button type="button" 
              class="delete-btn px-2 py-1 text-red-600 hover:text-red-800">✖</button>
    </div>
  </div>

  <button type="button" id="addMoreBtn" 
          class="mt-3 px-3 py-1 bg-green-600 text-white rounded-md shadow hover:bg-green-700 text-sm">
    + Add More
  </button>
</div>
<div class="mb-6">
    <input type="submit" class="bg-green-700 p-2 rounded-md text-white font-bold w-full" value="Create Property">
</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const addMoreBtn = document.getElementById("addMoreBtn");
    const additionalImages = document.getElementById("additionalImages");

    addMoreBtn.addEventListener("click", function () {
      const wrapper = document.createElement("div");
      wrapper.classList.add("flex", "items-center", "space-x-2");

      wrapper.innerHTML = `
        <input type="file" name="images[]" 
               class="block w-full border border-gray-300 rounded-md shadow-sm text-sm">
        <button type="button" class="delete-btn px-2 py-1 text-red-600 hover:text-red-800">✖</button>
      `;

      // delete functionality
      wrapper.querySelector(".delete-btn").addEventListener("click", function () {
        wrapper.remove();
      });

      additionalImages.appendChild(wrapper);
    });

    // Attach delete to initial input
    document.querySelectorAll(".delete-btn").forEach(btn => {
      btn.addEventListener("click", function () {
        btn.parentElement.remove();
      });
    });
  });
</script>
    
            </form>
        </div>
    </div>
@endsection