const { execSync } = require('child_process');
const glob = require('fast-glob');

/**
 * This script automates the process of running `yarn setup`
 * for each theme directory in your project. It uses `fast-glob`
 * to dynamically locate all directories and `execSync` to run
 * the setup command in each directory.
 */

(async () => {
  // Define the paths to your theme directories.
  // This will find all directories at the same level as this script's location.
  // `../*/` means "any directory in the parent folder."
  const themeDirectories = await glob('../../*/', {
    onlyDirectories: true, // Ensure only directories are returned
    cwd: './scripts',        // Set the current working directory to where this script is located
    absolute: true,         // Return absolute paths to directories for consistency
  });

  // Loop through each found directory and run `yarn setup`
  themeDirectories.forEach((dir) => {
    console.log(`Running yarn build in ${dir}`);  // Log the directory where setup is running

    try {
      // Execute `yarn build` in each theme directory
      execSync('yarn setup', { cwd: dir, stdio: 'inherit' });
    } catch (error) {
      // If the setup command fails in a theme, catch and log the error without stopping the script
      console.error(`Failed to run yarn build in ${dir}: ${error.message}`);
    }
  });
})();
