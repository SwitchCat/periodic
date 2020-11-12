<!-- PROJECT SHIELDS -->
[![Twitter Follow](https://img.shields.io/twitter/follow/SwitchcatA?style=social)](https://twitter.com/SwitchcatA)
[![Issues](https://img.shields.io/github/issues/SwitchCat/framework.svg?style=flat-square)](https://github.com/SwitchCat/periodic/issues)
![GitHub All Releases](https://img.shields.io/github/downloads/SwitchCat/periodic/total?logo=GitHub)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<img src="https://img.shields.io/static/v1?label=SwitchCat&message=Framework&color=ff7701&style=flat-square" />

<br>
<p align="center">
  <h1 align="center">SwitchCat/periodic</h1>
</p>

<!-- TABLE OF CONTENTS -->
## Table of Contents

* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Dependencies](#dependencies)
  * [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)

<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

<!-- PREREQUISITES -->
### Prerequisites

* PHP7.4+
* [Composer](https://getcomposer.org/)

<!-- DEPENDENCIES -->
### Dependencies

* [jajo/jsondb](https://packagist.org/packages/jajo/jsondb)
* [hansott/range-regex](https://github.com/hansott/range-regex)

<!-- INSTALLATION -->
### Installation

Use composer from the root of your project folder to download the library.
```sh
composer require switchcat/periodic
```

<!-- USAGE EXAMPLES -->
## Usage

<p>All method return an array containing either the element's data either an array of elements with their data.</p>

* Create the periodic object
```sh
$Periodic = new \SwitchCat\Periodic\Periodic();
```
* Get all elements from the periodic table
```sh
$Periodic->getAll();
```
* Get an element by name
```sh
$Periodic->getElementByName(string $name);
```
* Get an element by symbol
```sh
$Periodic->getElementBySymbol(string $name);
```
* Get an element by number
```sh
$Periodic->getElementByNumber(int $number);
```
* Get an element by category
```sh
$Periodic->getElementsByCategory(string $category);
```
* Get a collection of elements by atomic mass range 
```sh
$Periodic->getElementsByAtomicMass(int $min, int $max);
```
* Get an element by phase
```sh
$Periodic->getElementsByPhase(string $phase);
```
* Get a collection of elements by melting point range  
```sh
$Periodic->getElementsByMeltingPoint(int $min, int $max);
```
* Get a collection of elements by boiling point range
```sh
$Periodic->getElementsByBoilingPoint(int $min, int $max);
```
* Get a collection of elements by density range
```sh
$Periodic->getElementsByDensity(int $min, int $max);
```

<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

<a href="https://switchcat.agency" ><img src="https://img.shields.io/static/v1?label=SwitchCat&message=Agency&color=ff7701&style=for-the-badge" /></a>

<!-- ACKNOWLEDGEMENTS -->

## Based on the work of <a href="https://github.com/Bowserinator/Periodic-Table-JSON" >Bowserinator/Periodic-Table-JSON</a>

### Periodic-Table-JSON
A json of the entire periodic table. Feel free to use it in your projects.

Temperatures such as boiling points and melting points are given in degrees kelvin.  Densities are given in g/l for gases and g/cm³ for solids and liquids and molar heat in (mol*K).
Information that is missing is represented as null. Some elements may have an image link to their spectral bands.

All elements have a three sentence summary from Wikipedia. Currently the color tag is useless, so please use appearance instead.

**Electron configuration** is given as a string, with each orbital separated by a space.  **Electron configuration semantic** is given as a string, this is the short-hand version of the electron configuration. Elements with a semantic electron configuration marked with a "*" mean that the electron configuration has not yet been confirmed. **Electron shells** are given as an array, the first item is the number of electrons in the first shell, the 2nd item is the number of electrons in the second shell, and so on.

Both **ionization energy** and **first electron affinities** are given as the energy required to *detach* an electron from the anion.  Ionization energies are given as an array for successive ionization energy.

A link to the source where the information was from is provided in each element under the key "source".

Here's an example of how it's formatted:
```json
{
	"elements" : [{
		"name": "Hydrogen",
		"symbol": "H",
		"number": 1,
		"period": 1,
		"category": "diatomic nonmetal ",
		"atomic_mass": 1.008,
		"color": null,
		"appearance": "colorless gas",
		"phase": "Gas",
		"melt": 13.99,
		"boil": 20.271,
		"density": 0.08988,
		"discovered_by": "Henry Cavendish",
		"molar_heat": 28.836,
		"source":"https://en.wikipedia.org/wiki/Hydrogen",
		"named_by": "Antoine Lavoisier",
		"spectral_img": "https://en.wikipedia.org/wiki/File:Hydrogen_Spectra.jpg",
		"summary": "Hydrogen is a chemical element with chemical symbol H and atomic number 1. With an atomic weight of 1.00794 u, hydrogen is the lightest element on the periodic table. Its monatomic form (H) is the most abundant chemical substance in the Universe, constituting roughly 75% of all baryonic mass.",
		"ypos": 1,
		"xpos": 1,
		"shells": [
			1
		],
		"electron_configuration": "1s1",
		"electron_configuration_semantic": "1s1", 
		"electron_affinity": 72.769,
		"electronegativity_pauling": 2.20,
		"ionization_energies": [
			1312.0
		],
		"cpk-hex": "ffffff"
	}]
}
```

