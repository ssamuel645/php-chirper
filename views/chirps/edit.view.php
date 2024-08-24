<?php view('partials/head') ?>
<?php view('partials/nav') ?>
<?php view('partials/banner', compact(['heading'])) ?>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <form
    action="/chirps/create"
    method="POST"
  >
    <label
      for="content"
      class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
    ></label>
    <div class="relative">
      <div
        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
          />
        </svg>
      </div>
      <input
        type="text"
        id="content"
        name="content"
        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
        value="<?= $chirp['content'] ?>"
      />

      <button
        type="submit"
        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"
      >
        Update
      </button>
    </div>
  </form>
</div>

<?php view('partials/footer'); ?>
