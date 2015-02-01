# PHP Flight Planning Simulator

This flight sim will allow a user to create flight planes by selecting an available
airplane at a destination, and plotting destination(s). THIS IS ONLY A SIMULATION MEANT
FOR EDUCATIONAL PURPOSES ONLY. DO NOT ATTEMPT TO USE THIS AND EXPECT ANY REAL WORLD
RESULTS.

## Installation Instructions

We're using composer to manage all dependencies as well as relying on it to generate
handle autoloading. When checkouting out the project run the following command to
install the dependencies.

> composer install

## Gotcha's

When adding, refactoring class names, or reviewing a pull request it may be necessary
to dump the autoload file. Run the following command to accomplish this.

> composer dumpautoload -o

## Testing

More to come on this in the future.