/**
 * Concept
 * ============
 * I need to select some users randomly from a given list, where these users
 * have to have done some actions. For example, given a certain Facebook post,
 * they have to: shared it and/or liked it and/or commented on it.
 *
 * Task:
 * Print all user names that shared a given Facebook post.
 * AC: Run it directly using the browser console.
 */
(() => {
  "use strict";

  class User {
    constructor(name) {
      this.name = name;
    }
  }

  class UserList {
    constructor(users) {
      this.users = users || [];
    }
    add(user) {
      if (!this.exists(user)) {
        this.users.push(user);
      }
    }
    exists(user) {
      let exists = false;
      this.users.forEach(currentUser => {
        if (currentUser.name === user.name) {
          exists = true;
        }
      });
      return exists;
    }
    all() {
      return this.users;
    }
    total() {
      return this.users.length;
    }
    getByIndex(i) {
      return this.users[i];
    }
  }

  function crawlUserList(selector, nameAttribute) {
    const users = new UserList();
    document.querySelectorAll(selector).forEach(function(el) {
      const userName = el.getAttribute(nameAttribute);
      if (userName !== null) {
        users.add(new User(userName));
      }
    });
    return users;
  }

  function printUserNames(users) {
    users.all().forEach((user, index) => {
      const { name } = user;
      console.log(`id${index}, name:${name}`);
    });
  }

  function findRandomUsers(users, total, maxTries = 1000) {
    const randomUsers = new UserList();
    let tries = 0;
    while (randomUsers.total() < total) {
      if (tries > maxTries) {
        console.log("Emergency exit due to a reached limit!");
        break;
      }
      let randomUser = users.getByIndex(
        Math.floor(Math.random() * users.total())
      );
      if (randomUser && !randomUsers.exists(randomUser)) {
        randomUsers.add(randomUser);
      }
      tries++;
    }
    return randomUsers;
  }

  const sharedSelector = "#repost_view_dialog > div div.clearfix a.profileLink";
  const nameAttribute = "title";
  const usersThatSharedThePost = crawlUserList(sharedSelector, nameAttribute);

  console.log("Total users");
  printUserNames(usersThatSharedThePost);
  console.log(`Random users`);
  printUserNames(findRandomUsers(usersThatSharedThePost, 5));
})();
