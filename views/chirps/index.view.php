<?php view('partials/head') ?>
<?php view('partials/nav') ?>
<?php view('partials/banner', compact(['heading'])) ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
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
              <div class="inline-flex items-center text-base font-semibold">
                <a
                  href="/chirps/edit?id=<?= $chirp['chirpId'] ?>"
                  class="p-2 font-medium text-blue-600 hover:underline"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-4 inline"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                    />
                  </svg>

                  Edit
                </a>
                |
                <a
                  href="#"
                  class="p-2 font-medium text-red-600 hover:underline"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-4 inline"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                    />
                  </svg>

                  Delete
                </a>
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
