<?php

namespace App\Http\Controllers;

use App\Models\ThemeToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeTokenController extends Controller
{
    /**
     * Return the theme response in the format of the theme tokens
     * 
     * @param ThemeToken $themeToken
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    private function themeResponse(ThemeToken $themeToken, string $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => [
                'theme_name' => $themeToken->theme_name,
                'tokens' => $themeToken->tokens,
            ],
        ]);
    }

    /**
     * Return the active theme
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getActiveTheme()
    {
        $themeToken = ThemeToken::where('is_active', true)->first();

        if (!$themeToken) {
            return response()->json([
                'success' => false,
                'message' => 'Active theme not found.',
                'data' => null,
            ], 404);
        }

        return $this->themeResponse($themeToken, 'Successfully retrieved active theme.');
    }

    /**
     * Activate the theme
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activateTheme(Request $request)
    {
        $validated = $request->validate([
            'theme_name' => 'required|string|in:light,dark',
        ]);

        $themeToken = DB::transaction(function () use ($validated) {
            ThemeToken::query()->update(['is_active' => false]);
            $theme = ThemeToken::where('theme_name', $validated['theme_name'])->firstOrFail();
            $theme->update(['is_active' => true]);
            return $theme->fresh();
        });

        return $this->themeResponse(
            $themeToken,
            "Theme '{$themeToken->theme_name}' is now active."
        );
    }
}
