<?php view('partials/head') ?>
<?php view('partials/nav') ?>
<?php view('partials/banner', compact(['heading'])) ?>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <div
    class="w-full bg-white border border-gray-200 rounded-lg shadow sm:p-8 d"
  >
    <form
      class="max-w-sm mx-auto"
      action="/login"
      method="POST"
    >
      <div class="mb-5">
        <label
          for="email"
          class="block mb-2 text-sm font-medium text-gray-900"
          >Your email</label
        >
        <input
          type="email"
          id="email"
          name="email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          value="<?= old('email') ?>"
          placeholder="user@email.com"
          required
        />
        <?php if (isset($errors['email'])) : ?>
        <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">
          <?= $errors['email'] ?>
        </p>
        <?php endif ; ?>
      </div>

      <div class="mb-5">
        <label
          for="password"
          class="block mb-2 text-sm font-medium text-gray-900"
          >Your password</label
        >
        <input
          type="password"
          id="password"
          name="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          required
        />
        <?php if (isset($errors['password'])) : ?>
        <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">
          <?= $errors['password'] ?>
        </p>
        <?php endif ; ?>
      </div>

      <button
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Log in
      </button>
    </form>
  </div>
</div>
<?php view('partials/footer'); ?>
