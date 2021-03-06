/**
 * Copyright 2017 OpenStack Foundation
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/

import { getRequest, putRequest, createAction, deleteRequest, postRequest } from "~core-utils/actions";

import URI from "urijs";

export const LOADING = 'LOADING';
export const RECEIVE_ITEMS = 'RECEIVE_ITEMS';
export const ITEM_UPDATED  = 'ITEM_UPDATED';
export const ITEM_DELETED  = 'ITEM_DELETED';
export const ITEMS_MERGED  = 'ITEMS_MERGED';

export const fetchAll = getRequest(
    createAction(LOADING),
    createAction(RECEIVE_ITEMS),
    'api/v1/tags'
);

export const saveItem = (params) => dispatch => {
    if (params.tag_id) {
        putRequest(
            createAction(LOADING),
            createAction(ITEM_UPDATED),
            `api/v1/tags/${params.tag_id}`,
            params
        )(params)(dispatch);
    } else {
        postRequest(
            createAction(LOADING),
            createAction(ITEM_UPDATED),
            `api/v1/tags`,
            params
        )(params)(dispatch);
    }
}

export const deleteItems = (params) => dispatch => {
    deleteRequest(
        createAction(LOADING),
        createAction(ITEM_DELETED),
        `api/v1/tags`,
        params
    )(params)(dispatch);
}

export const mergeItems = (params) => dispatch => {
    putRequest(
        createAction(LOADING),
        createAction(ITEMS_MERGED),
        `api/v1/tags/merge`,
        params
    )(params)(dispatch);
}

