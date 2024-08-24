<?php view('partials/head') ?>
<?php view('partials/nav') ?>
<?php view('partials/banner', compact(['heading'])) ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form
      action="/chirps/create"
      method="POST"
    >
      <label
        for="content"
        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
        >New Chirp</label
      >
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
          placeholder="New Chirp"
          value="<?= !empty($errors) ? $_POST['content'] : '' ?>"
        />

        <button
          type="submit"
          class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"
        >
          Post
        </button>
      </div>
    </form>

    <?php if (isset($errors)) : ?>
    <?php if (isset($errors['content'])) : ?>
    <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">
      <?= $errors['content'] ?>
    </p>
    <?php else : ?>
    <p class="mt-2 text-sm text-green-600 dark:text-green-500">
      <span class="font-medium">Congrats!</span> Your chirp was posted.
    </p>
    <?php endif ?>
    <?php endif; ?>

    <hr
      class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700"
    />

    <div
      class="w-full bg-white border border-gray-200 rounded-lg shadow sm:p-8 d"
    >
      <div class="flow-root">
        <ul
          role="list"
          class="divide-y divide-gray-200 dark:divide-gray-700"
        >
          <?php foreach ($chirps as $chirp) : ?>
          <li class="py-3 sm:py-4">
            <div class="flex items-center">
              <div class="flex-shrink-0">
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
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                  />
                </svg>
              </div>
              <div class="flex-1 min-w-0 ms-4">
                <p class="text-sm font-medium t truncate">
                  <?= htmlspecialchars($chirp['name']) ?>
                </p>
                <p class="text-sm text-gray-500 truncate">
                  <?= htmlspecialchars($chirp['email']) ?>
                </p>
              </div>
            </div>
            <p class="m-3">
              <?= htmlspecialchars($chirp['content']) ?>
            </p>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php view('partials/footer') ?>
