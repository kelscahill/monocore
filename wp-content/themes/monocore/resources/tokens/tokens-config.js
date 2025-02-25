const StyleDictionary = require('style-dictionary');

/**
 * Define theme customizations
 */
const themePrefix = 'mc';
const themeFontWeightRegular = '400';
const themeFontWeightMedium = '500';
const themeFontWeightBold = '700';
const themeFontWeightHeavy = '800';
const themeFontWeightBlack = '900';
const themeFontBaseSize = 16;
const themeSpaceBaseSize = 16;
const themeFontFamilyFallback = 'sans-serif';
const comment = '\n\n/* This file is auto-generated by Style Dictionary. Do not edit directly. */\n';

/**
 * SCSS Global Variable Formatting
 * 1. Filter tokens related to breakpoints and create variables
 * 2. Convert JSON string to its original value
 * 3. Check if the token uses references
 * 4. Map and create variables for breakpoint-related tokens
 * 5. Return the variables in the file
 */
StyleDictionary.registerFormat({
  name: 'scss/variables',
  formatter: function ({ dictionary, options }) {
    const breakpointVariables = dictionary.allTokens
      /* 1 */
      .filter(token => token.name.includes('breakpoint'))
      .map(token => {
        /* 2 */
        let value = JSON.stringify(token.value);
        value = JSON.parse(value);
        /* 3 */
        if (options.outputReferences && dictionary.usesReference(token.original.value)) {
          const refs = dictionary.getReferences(token.original.value);
          value = refs.map(ref => `breakpoint-${ref.name}`).join(', ');
        }
        /* 4 */
        return `$${themePrefix}-${token.name}: ${value};`;
      })
      .join('\n');
    /* 5 */
    return comment + breakpointVariables;
  },
});

/**
 * Token Formatting
 * 1. Filter other specific tokens, format them, and create variables
 * 2. Convert JSON string to its original value
 * 3. Format font-weight tokens
 * 4. Format typography tokens
 * 5. Format box-shadow tokens
 * 5. Format space tokens
 * 6. Format all tokens
 * 7. Check if the token uses references and format accordingly
 * 8. Map and create variables for other tokens
 * 9. Format the token output
 * 10. Filter out undefined values and join with line breaks
 * 11. Wrap the variables inside :root{}
 */
StyleDictionary.registerFormat({
  name: 'tokens',
  formatter: function ({ dictionary, options }) {
    /* 1 */
    const otherVariables = dictionary.allTokens
      .filter(token =>
        !token.name.endsWith('-italic') &&
        !token.name.endsWith('-underline') &&
        !token.name.includes('breakpoint')
      )
      .map(token => {
        let name;
        /* 2 */
        let value = JSON.stringify(token.value);
        value = JSON.parse(value);
        /* 3 */
        if (token.name.includes('font-weight')) {
          name = token.name;
          value = formatFontWeightValue(token.value);
        }
        /* 4 */
        else if (token.name.includes('typography')) {
          name = token.name.endsWith('-regular') ? token.name.replace('-regular', '') : token.name;
          value = formatTypographyValue(token.value);
        }
        /* 5 */
        else if (token.name.includes('box-shadow')) {
          name = token.name;
          value = formatBoxShadowValue(token.value);
        }
        /* 6 */
        else if (!token.name.includes('base') && token.name.includes('space')) {
          name = token.name;
          value = formatSpaceValue(token.value);
        }
        /* 7 */
        else {
          name = token.name;
          value = token.value;
        }
        /* 8 */
        if (token.name.includes('color') && options.outputReferences) {
          if (dictionary.usesReference(token.original.value)) {
            const refs = dictionary.getReferences(token.original.value);
            refs.forEach(ref => {
              const refName = ref.name.endsWith('-regular') ? ref.name.replace('-regular', '') : ref.name;
              value = `var(--${themePrefix}-${refName})`;
            });
          }
        }
        /* 9 */
        const tokenOutput = `  --${themePrefix}-${name}: ${value};`;
        return tokenOutput;
      }).filter(Boolean).join('\n'); /* 10 */

    /* 11 */
    if (options.themeName === 'inverted' || options.themeName === 'subtle') {
      return comment + `.u-background--${options.themeName} {\n${otherVariables}\n}`;
    } else {
      return comment + `:root {\n${otherVariables}\n}\n`;
    }
  },
});

/**
 * Format box-shadow tokens into a string
 * 1. Check if value is an array and join with a comma
 * 2. Handle single box-shadow object
 */
function formatBoxShadowValue(value) {
  if (Array.isArray(value)) {
    return value.map(shadow => `${shadow.x}px ${shadow.y}px ${shadow.blur}px ${shadow.spread}px ${shadow.color}`).join(', '); /* 1 */
  } else {
    return `${value.x}px ${value.y}px ${value.blur}px ${value.spread}px ${value.color}`; /* 2 */
  }
}

/**
 * Format font-weight tokens into a value
 * 1. Convert text string values to number values for font-weights
 * 2. Return the string value
 */
function formatFontWeightValue(value) {
  /* 1 */
  let fontWeight = '';
  if (value === 'Black') {
    fontWeight = themeFontWeightBlack;
  } else if (value === 'Heavy') {
    fontWeight = themeFontWeightHeavy;
  } else if (value === 'Bold') {
    fontWeight = themeFontWeightBold;
  } else if (value === 'Medium') {
    fontWeight = themeFontWeightMedium;
  } else {
    fontWeight = themeFontWeightRegular;
  }
  /* 2 */
  return `${fontWeight}`;
}

/**
 * Format typography tokens into a string
 * 1. Convert pixel values to rems
 * 2. Return the string value
 */
function formatTypographyValue(value) {
  /* 1 */
  const fontSize = `${parseFloat(value.fontSize) / themeFontBaseSize}rem`;
  const lineHeight = `${parseFloat(value.lineHeight) / themeFontBaseSize}rem`;
  return `${formatFontWeightValue(value.fontWeight)} ${fontSize}/${lineHeight} ${value.fontFamily}, ${themeFontFamilyFallback}`; /* 3 */
}

/**
 * Format space tokens into rems
 * 1. Convert pixel values to rems
 * 2. Return the string value
 */
function formatSpaceValue(value) {
  /* 1 */
  const space = `${parseFloat(value) / themeSpaceBaseSize}rem`;
  return `${space}`; /* 3 */
}

/**
 * Style dictionary theme specific config
 * This accepts a theme parameter, which is used to control which set of tokens to compile, and to define theme-specific compiled output.
 * @param {string} themeName
 */
const styleDictionaryConfigBase = () => {
  const include = [
    `./resources/tokens/base/animations.json`,
    `./resources/tokens/base/borders.json`,
    `./resources/tokens/base/breakpoints.json`,
    `./resources/tokens/base/icons.json`,
    `./resources/tokens/base/layout.json`,
    `./resources/tokens/base/opacity.json`,
    `./resources/tokens/base/spacing.json`,
    `./resources/tokens/base/typography.json`,
    `./resources/tokens/base/z-index.json`,
  ];

  return {
    include: include,
    platforms: {
      scss: {
        transformGroup: 'scss',
        buildPath: './',
        files: [
          {
            destination: `/resources/styles/tokens/tokens-base.scss`,
            format: 'tokens',
            options: {
              outputReferences: true,
            },
          },
          {
            destination: `/resources/styles/_variables.scss`,
            format: 'scss/variables',
            options: {
              outputReferences: true,
            },
          },
        ],
      },
    },
  };
};

const styleDictionaryBuildBase = (themeName) => {
  const styleDictionaryConfig = styleDictionaryConfigBase(themeName);
  const StyleDictionaryExtended = StyleDictionary.extend(styleDictionaryConfig);
  StyleDictionaryExtended.buildAllPlatforms();
};

/**
 * Build the style dictionary base styles
 */
styleDictionaryBuildBase();

/**
 * Style dictionary theme specific config
 * This accepts a theme parameter, which is used to control which set of tokens to compile, and to define theme-specific compiled output.
 * @param {string} themeName
 */
const styleDictionaryThemeConfig = (themeName) => {
  const include = [
    `./resources/tokens/base/colors.json`,
    `./resources/tokens/base/shadows.json`,
    `./resources/tokens/theme/${themeName}/*.json`,
    `./resources/tokens/theme/${themeName}/*.json`,
  ];

  return {
    include: include,
    platforms: {
      scss: {
        transformGroup: 'scss',
        buildPath: './',
        files: [
          {
            destination: `/resources/styles/tokens/tokens-${themeName}.scss`,
            format: 'tokens',
            options: {
              outputReferences: true,
              themeName: themeName,
            },
          },
        ],
      },
    },
  };
};

const styleDictionaryBuildTheme = (themeName) => {
  const styleDictionaryConfig = styleDictionaryThemeConfig(themeName);
  const StyleDictionaryExtended = StyleDictionary.extend(styleDictionaryConfig);
  StyleDictionaryExtended.buildAllPlatforms();
};

/**
 * Build each style dictionary theme
 */
styleDictionaryBuildTheme('default');
styleDictionaryBuildTheme('inverted');
styleDictionaryBuildTheme('subtle');
