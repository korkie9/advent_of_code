const fs = require('fs');

class Puzzle2 {
  static solve() {
    const input = this.getInputArr('../day_2/input.txt');
    const levelsArr = [];
    let ans = 0;

    // Convert input to 2D array
    input.forEach(val => {
      const inputArr = val.trim().split(" ");
      levelsArr.push(inputArr);
    });

    // Process the 2D array
    levelsArr.forEach(reportArr => {
      const isSafe = this.arrayIsSafe(reportArr);
      if (isSafe) ans++;
    });

    return ans;
  }

  static arrayIsSafe(arr) {
    let isIncreasing = true;
    let isSafe = true;

    if (parseInt(arr[0]) - parseInt(arr[1]) > 0) {
      isIncreasing = false;
    }

    let hasSpliced = false;

    while (true) {
      let needsRetry = false;

      for (let i = 0; i < arr.length - 1; i++) {
        const diff = parseInt(arr[i]) - parseInt(arr[i + 1]);
        if (
          (diff > 0 && isIncreasing) ||
          (diff < 0 && !isIncreasing) ||
          (diff === 0)
        ) {
          if (!hasSpliced) {
            arr.splice(i + 1, 1);
            hasSpliced = true;
            needsRetry = true;
            break;
          } else {
            return false;
          }
        }

        if (diff > 3 || diff < -3) {
          if (!hasSpliced) {
            console.log("arr before splice: ", arr)
            arr.splice(i + 1, 1);
            console.log("arr after splice: ", arr)
            hasSpliced = true;
            needsRetry = true;
            break;
          } else {
            console.log("bool from <> 3", false)
            return false;
          }
        }
      }

      if (!needsRetry) break;
    }
    console.log("super safe bra")

    return isSafe;
  }

  static getInputArr(filePath) {
    return fs.readFileSync(filePath, 'utf-8').trim().split('\n');
  }
}

console.log(Puzzle2.solve());
