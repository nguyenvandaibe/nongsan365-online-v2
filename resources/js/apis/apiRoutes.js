export default {
    getAllGaps: "v1/gaps",

    product: {

        storeDiaryList(productId) {
            return "v1/user/products/" + productId + "/diaries";
        }
    },

    diary: {
        loadFields(diaryId) {
            return "v1/diaries/" + diaryId + "/fields";
        },

        /**
         * Lấy danh sách nhật ký theo loại nông sản
         * @param type
         * @returns {string}
         */
        loadDiaries(type) {
            return "v1/diaries?type=" + type;
        }
    },

    productDiary: {
        loadRecords(productId, diarySlug) {
            return "v1/user/products/" + productId + "/diaries/" + diarySlug;
        }
    },

    photo: {
        upload() {
            return "v1/user/photos";
        }
    }
}
