# Utilities

Collection of useful PHP utilities.

## Project Outlines

The project outlines as described in my blog post about [Open Source Software Collaboration](https://blog.fox21.at/2019/02/21/open-source-software-collaboration.html).

- The main purpose of this collection is to provide common single functions or classes, which are too small for a separate project.
- This list is open. Feel free to request features.

## Features

- PHP 7 compatible.
- [Hexadecimal](https://en.wikipedia.org/wiki/Hexadecimal) encoding.
- [LEB128](https://en.wikipedia.org/wiki/LEB128) encoding.
- Debug [binary](https://en.wikipedia.org/wiki/Binary_number) data.
- Generate random data using [mt_rand()](http://php.net/manual/en/function.mt-rand.php).
- Big/Little endian converter.

## Installation

The preferred method of installation is via [Packagist](https://packagist.org/packages/thefox/utilities) and [Composer](https://getcomposer.org/). Run the following command to install the package and add it as a requirement to composer.json:

```bash
composer require thefox/utilities
```

## Links

- [Packagist Package](https://packagist.org/packages/thefox/utilities)
- [PHPWeekly - Issue October 16, 2014](http://www.phpweekly.com/archive/2014-10-16.html)

## License

Copyright (C) 2014 Christian Mayer <https://fox21.at>

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
