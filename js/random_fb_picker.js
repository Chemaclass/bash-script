/**
 * Concept
 * ============
 * I need to select some users randomly from a given list, where these users
 * have to have done some actions. For example, given a certain Facebook post,
 * they have to: shared it and/or liked it and/or commented on it.
 */

/**
 * Task:
 * Print all user names that shared a given Facebook post.
 * AC: Run it directly using the browser console.
 */
function printUserNames() {
  "use strict";
  class User {
    constructor(name) {
      this.name = name;
      this.didShared = false; // TODO: specify whether it was shared|liked|commented
    }
  }

  class UserList {
    constructor() {
      this.users = [];
    }
    add(user) {
      if (!this._exists(user)) {
        this.users.push(user);
      }
    }
    _exists(user) {
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
  }

  const users = new UserList();

  const sharedPostSelector =
    "#repost_view_dialog > div div.clearfix a.profileLink";
  document.querySelectorAll(sharedPostSelector).forEach(function(el) {
    const userName = el.getAttribute("title");
    if (userName !== null) {
      users.add(new User(userName));
    }
  });

  users.all().forEach((user, i) => {
    const { name } = user;
    console.log(`id${i}, name:${name}`);
  });
}

printUserNames();
