<?php view('partials/head') ?>
<?php view('partials/nav') ?>
<?php view('partials/banner', compact(['heading'])) ?>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <form
    action="/chirps"
    method="POST"
  >
    <input
      type="hidden"
      name="_method"
      value="PATCH"
    />
    <input
      type="hidden"
      name="id"
      value="<?= $chirp['id'] ?>"
    />
    <label
      for="content"
      class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
    ></label>
    <div class="relative">
      <input
        type="text"
        id="content"
        name="content"
        class="block w-full py-4 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
        value="<?= !empty($errors) ? htmlspecialchars($_POST['content']) : htmlspecialchars($chirp['content']) ?>"
      />

      <button
        type="submit"
        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"
      >
        Update
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
  <p class="mt-6">
    <a
      href="/chirps"
      class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
    >
      Cancel
    </a>
  </p>
</div>

<?php view('partials/footer'); ?>
